inp = ['0','1']

input_numbers = 4

result = {}

possible_input = []

for i in inp:
    for j in inp:
        for k in inp:
            for l in inp:
                possible_input.append(i+j+k+l)

possible_input.remove('0000')
for bit in possible_input:
    o_1 = (int(bit[0]) & int(bit[3])) | (int(bit[2]) ^ int(bit[1]))
    o_2 = (int(bit[3]) ^ int(bit[1])) | (int(bit[0]) ^ int(bit[2]))
    o_3 = ((int(bit[0]) ^ int(bit[2])) ^ (int(bit[1]))) | int(bit[3])
    o_4 = ((int(bit[2]) & int(bit[0])) & int(bit[1])) & (int(bit[3]))
    result[bit] = str(o_1) + str(o_2) + str(o_3) + str(o_4)


for k,v in result.items():
    print(k, ':', v)
