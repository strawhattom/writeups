from pwn import *

io = remote('ctf10k.root-me.org', 8002)



op = ['+','-','*','/']

res = io.recvline().decode()
print(res)
while True:
    res = io.recvline().decode()
    print(res)
    sp = res.replace('x','*').split()

    stack = []

    for tk in sp:
        if tk in op:
            x,y = stack[-1],stack[-2]
            operation = eval(f'{y} {tk} {x}')
            stack.pop()
            stack.pop()
            stack.append(operation)
        else : stack.append(int(tk))

    print(str(stack[0]))
    io.sendline(str(stack[0]).encode())
    res = io.recvline().decode()
    print(res)
    res = io.recvline().decode()
    print(res)

io.interactive()