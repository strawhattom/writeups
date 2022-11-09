from pwn import *

io = remote('ctf10k.root-me.org', 8002)

ops = ['+','x','-','/']







# calc

while True:
    res = io.recvline().decode()
    print(res)
    res = io.recvline().decode()
    print(res)
    sp = res.split()
    nbr = []
    op = []

    for el in sp:
        if el.isnumeric(): nbr.append(el) 
        else : op.append(el)

    nbr = [int(x) for x in nbr]
    
    s = 0

    nbr.pop(0)

    while len(nbr) > 0 and len(op) > 0:
        x,y = -1,-1
        if first:
            x,y = nbr[0],nbr[1]
            first = False
        else:
            x,y = s,nbr[0]
        operator = '*' if op[0] == 'x' else op[0]

        operation = f'{x} {operator} {y}'
        print(operation)

        s = eval(operation)
        print("Total :", s)
        nbr.pop(0)
        
        op.pop(0)
    print(nbr)
    print(op)
    operator = '*' if op[0] == 'x' else op[0]
    x = s
    y = nbr[0]
    operation = f'{x} {operator} {y}'
    s = eval(operation)
    io.sendline(str(s).encode())

io.interactive()