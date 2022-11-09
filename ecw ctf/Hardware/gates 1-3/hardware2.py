from pprint import pprint

inp = ['0','1']

input_numbers = 4

result = {}

possible_input = []
first = 1

for i in inp:
    for j in inp:
        for k in inp:
            for l in inp:
                possible_input.append(i+j+k+l)
possible_input.remove('0000')
# pprint(possible_input)



missing_input = []

def output_0(bit0, bit1, bit2, bit3):
    return bit0 ^ bit1 ^ bit2 ^ bit3    

def output_1(bit0, bit1, bit2, bit3):
    return bit0 | (bit1 | bit2) & bit3

def output_2(bit0, bit1, bit2, bit3):
    return bit3 & bit1 & bit0 & bit2

def output_3(bit0, bit1, bit2, bit3):
    return bit0 | bit1 | bit2 | bit3

def output(bit):
    b_0 = int(bit[0])
    b_1 = int(bit[1])
    b_2 = int(bit[2])
    b_3 = int(bit[3])

    return str(output_0(b_0,b_1,b_2,b_3)) + str(output_1(b_0,b_1,b_2,b_3)) + str(output_2(b_0,b_1,b_2,b_3)) + str(output_3(b_0,b_1,b_2,b_3))

with open('input.txt','r') as file:
    inp = {}
    for line in file.readlines():
        sp = line.strip().replace(' ','').split(':')
        inp[sp[0]] = sp[1]
    for input in possible_input:
        if input not in inp:
            missing_input.append(input)

    i = 1
    for k,v in inp.items():
        b0 = int(k[0])
        b1 = int(k[1])
        b2 = int(k[2])
        b3 = int(k[3])

        print(b0, b1, b2, b3, ' => ', v[2])

        assert str(output_2(b0,b1,b2,b3)) == v[2], f'Test {i} failed'
        
        i += 1
    print("All tests passed !")
    



