;--------------------;
;program operand.asm

.MODEL SMALL
.CODE
org 100h

coba:
    JMP mulai
    A DB 35
    B DB 2,3,1,9,?
    C DB 3 DUP(8)
    