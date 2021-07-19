import requests

data = {"a_key": "a_value"}
url = "http://httpbin.org/post"
response = requests.post(url, data)
print(response)

