from pwn import *
from ast import literal_eval
from pprint import pprint
from caesarcipher import CaesarCipher
import re


PORT = 27138

r = remote("213.32.7.237",PORT)

answers = ["yes","10/28"]                       # constant answers (first two questions)
question_type = ["maths","formated","encoding"] # used when getting random questions

alph = 'abcdefghijklmnopqrstuvwxyz'             # used to brute force caesar salad algorithm
array_alph = [x for x in alph]                  # 

save = -1

def brute_force_salad(cipher):
    cipher = cipher.strip('\n')
    bruteforce = {}
    for i in range(26):
        construct = ''
        for letter in cipher:
            letter_index = array_alph.index(letter)
            if (letter_index + i > len(alph)-1):
                letter_index -= (len(alph)-1)
                letter_index = -(letter_index) - 1
            construct += array_alph[letter_index]
        bruteforce[str(i)] = construct
    return bruteforce

def get_question_number(msg):
    print("RECEIVED :", msg)
    msg = msg.strip()

    if (re.search(r"b'*'",msg)) :
        return {'found':True,'number':4}
    else:
        found = False
        number = -1
        if (re.search(r'\D',msg)):
            number = msg.replace(' ','').split('.')[0]
            found = True
        return {'found':found,'number':number}

def detect_encoding(msg):
    sp = msg.split("'")[1]
    first_encoded_str = sp[0:2]
    encoding_type = ''
    match first_encoded_str:
        case '34':
            encoding_type = 'base16'
        case 'NC':
            encoding_type = 'base64'
        case 'G%':
            encoding_type = 'base85'
        case 'GQ':
            encoding_type = 'base32'
    return encoding_type

def do_operation(msg):
    return eval(msg)


i = 1
while(1):
    if save == -1:
        txt = r.recvline().decode().strip()
        print("Response >", txt)
    if(txt.split('.')[0].isnumeric() or re.search(r"b'.*'",txt) or save != -1):
        match i:
            case 1:
                r.sendline(answers[0].encode())
                print("Sending response :", answers[0] )
                if save != -1: 
                    i = save
                    save = -1
            case 2:
                print("Sending response :", answers[1])
                r.sendline(answers[1].encode())
                if save != -1: 
                    i = save
                    save = -1
            case 3:
                txt = r.recvline().decode()
                print("> Case 3")
                print(txt)
                res = do_operation(txt)
                print("Sending response 3 :", str(res))
                answers.append(str(res))
                r.sendline(str(res).encode())
                if save != -1 : 
                    i = save
                    save = -1
            case 4:
                print("> Case 4")
                if save != -1 : txt = random_question
                encoding_type = detect_encoding(txt)
                print("Sending response 4 :")
                print(encoding_type)
                answers.append(encoding_type)
                r.sendline(encoding_type.encode())
                if save != -1 : 
                    i = save
                    save = -1
            case 5:
                print("> Case 5")
                print("Sending response 5 :")
                formated_text = ','.join(answers)
                r.sendline(formated_text.encode())
                answers.append(formated_text)
                if save != -1 : 
                    i = save
                    save = -1
            case 6:
                print("> Case 6")
                print("Sending response 6 :")
                if save == -1 :txt = r.recvline().decode()
                else :
                    txt = r.recvline().decode()
                    i = save
                print(txt)
                arr = literal_eval(str(txt))
                arr_ind = [int(x) - 1 for x in arr]
                text = [answers[_] for _ in arr_ind]
                formated_text =  ','.join(text)
                answers.append(formated_text)

                r.sendline(formated_text.encode())

            case 7:
                print("> Case 7")
                
                random_question = r.recvline().decode().strip()

                save = i
                i = int(get_question_number(random_question)['number'])
                print("Question like number", i)
                print("Switching...")
                pass

            case 8:
                print("> Case 8")
                txt = r.recvline().decode()
                cipher = CaesarCipher(txt)
                print(txt)
                print("Sending response 8 :")
                cracked = cipher.cracked
                print(cracked)
                r.sendline(cipher.cracked.encode())

            case 9:
                print("> Case 9")
                print(txt)
                print(r.recvline().decode())
                txt = r.recvline().decode()
                print("Sending response 9 :")
                pprint(brute_force_salad(txt))


        if save == -1:
            i += 1
