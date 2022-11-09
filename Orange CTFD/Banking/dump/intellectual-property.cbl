IDENTIFICATION DIVISION.
   PROGRAM-ID. CTF.
   
   DATA DIVISION.
   WORKING-STORAGE SECTION.
   01    WS-0 PIC X(20) VALUE 'RPT19/='.
   01    WS-1 PIC X(20) VALUE 'tCQU+2345=='.
   01    WS-2 PIC X(20) VALUE 'LSU'.
   01    WS-3 PIC X(20) VALUE 'HNDpRekJDTUVxLPt3iu'.
   01    WS-4 PIC X(20) VALUE 'RkxBR'.
   01    WS-5 PIC X(20) VALUE 'cEpFRjNaWE5'.
   01    WS-6 PIC X(20) VALUE 'FcTmupV'.
   01    WS-7 PIC X(20) VALUE '2YldVaEllaGtu'.
   01    WS-CONCAT1 PIC X(52) VALUE SPACES.
   01    WS-CONCAT2 PIC X(52) VALUE SPACES.
   01    WS-CONCAT3 PIC X(52) VALUE SPACES.
   
   PROCEDURE DIVISION.
   MAIN-PARAGRAPH.
        STRING WS-6(1:1)
               WS-7(9:3)
               ':'
          INTO WS-CONCAT1
        END-STRING
        STRING WS-4 DELIMITED BY SPACE
               WS-3(17:1)
               WS-1 DELIMITED BY '+'
               WS-1(9:1)
               WS-2 DELIMITED BY SPACE
               WS-5(11:1)
               WS-3 DELIMITED BY 'x'
               WS-1(8:1)
               WS-5 DELIMITED BY SPACE
               WS-7(1:8)
               WS-0(1:5)
               WS-6 DELIMITED BY SPACE
               WS-1(10:2)
          INTO WS-CONCAT2
        END-STRING
        DISPLAY '>' WS-CONCAT3 '<'
        DISPLAY '>' WS-CONCAT1 '<'
        DISPLAY '>' WS-CONCAT2 '<'
        GOBACK
        .