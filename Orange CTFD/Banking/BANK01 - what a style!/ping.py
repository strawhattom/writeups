import requests
ip = "10"

available = []

for i in range(0,256):
    for j in range(0,256):
        for k in range(0,256):
            attempt = ".".join([ip,str(i),str(j),str(k)])
            print(attempt, end = '\r')
            req = requests.get("http://" + attempt)

            if (req.status_code == 200) :
                available.append(attempt)
                print(attempt, "is available")


print(available)