# Assembly

This was a simple project in my first year where I hand wrote a program in assembly for the JASPER processor which took two characters as inputs and calculated the differences between them. I achieved 20/20 for this assignment. 

![image](https://user-images.githubusercontent.com/87831546/144907004-247441c9-3982-4bc8-a8cf-762b8ca7f04d.png)

```
	ORG 0
	MOVE #$0,B
write	MOVE $E3,A	    *say ‘”The difference between”
	CMP #$0,A	   *check if screen ready
	BEQ write	   *if LSb is 0 loop
	MOVE B+data,A	   *move data to A
	MOVE A,$E2	   *write letter to screen
	ADD #$1,B	   *iterate over data
	CMP #^23,B	   *if reach end go to loop 
	BNE write	   *hasn’t reached the end so loop	
	JMP loop	

data	DC.W ^84	*T
	DC.W ^104	*h
	DC.W ^101	*e
	DC.W ^32	
	DC.W ^100	*d
	DC.W ^105	*i
	DC.W ^102	*f
	DC.W ^102	*f
	DC.W ^101	*e
	DC.W ^114	*r
	DC.W ^101	*e
	DC.W ^110	*n
	DC.W ^99	*c
	DC.W ^101	*e
	DC.W ^32
	DC.W ^98	*b
	DC.W ^101	*e
	DC.W ^116	*t
	DC.W ^119	*w
	DC.W ^101	*e
	DC.W ^101	*e
	DC.W ^110	*n
	DC.W ^32
	
data2	DC.W ^32
	DC.W ^97	*a
	DC.W ^110	*n
	DC.W ^100	*d
	DC.W ^32	

data3	DC.W ^32
	DC.W ^105	*i
	DC.W ^115	*s
	DC.W ^32	
	
loop	MOVE $E1,A	
	CMP #$0,A	*check if keyboard is ready	
	BEQ loop	*if not ready loop
	MOVE $E0,A	*input first letter
	MOVE A,$FB	*store first letter in memory for later

print1	MOVE $E3,B	
	CMP #$0,B	*check if screen ready
	BEQ print1	*if not ready loop
	MOVE A,$E2	*print letter to screen

	MOVE #$0,B
write2	MOVE $E3,A	   *say “ and “ 
	CMP #$0,A	    *check if screen ready
	BEQ write2	    *if not ready loop
	MOVE B+data2,A  *move data2 to A
	MOVE A,$E2	    *write letter to screen
	ADD #$1,B	    *iterate over data2
	CMP #^5,B	    *if reach end go to loop2
	BNE write2

loop2	MOVE $E1,B	
	CMP #$0,B	*check if keyboard is ready
	BEQ loop2	*if not ready loop
	MOVE $E0,B	*if ready input second letter
	MOVE B,$FC	*store second letter in memory for later

print2	MOVE $E3,A	
	CMP #$0,A	*check if screen ready
	BEQ print2	*if not ready loop
	MOVE B,$E2	*if ready print letter to screen

	MOVE #$0,B
write3	MOVE $E3,A	    *say “ is “
	CMP #$0,A	    *check if screen ready
	BEQ write3	    *if not ready loop
	MOVE B+data3,A  *move data3 to A
	MOVE A,$E2	    *write letter to screen
	ADD #$1,B	    *iterate over data
	CMP #^4,B	    *if reach end go to loop
	BNE write3

	MOVE $FB,A	*fetch letter 1 from memory
	MOVE $FC,B	*fetch letter 2 from memory
	CMP A,B
	BPL normal	*if difference is positive jump to normal
	JMP neg	*if difference is negative then sub B,A to make positive

neg	SUB B,A		*find difference between negative letters
	MOVE A,B
	MOVE B,$F4	*store in memory for later
	JMP next

normal	SUB A,B		*find difference between positive letters
	MOVE B,$F4	*store in memory for later

next	MOVE #^10,A	* if 0-9
	CMP A,B	
	BMI lessten

check1	MOVE #^20,A      *if 10-19
	CMP A,B
	BMI lesstwe
	MOVE #^26,A      *if 20-25
	CMP A,B
	BMI lessmax

lessten	ADD #^48,B	*convert to ASCII
print5	MOVE $E3,A	
	CMP #$0,A	*check if screen ready
	BEQ print5	*if not loop
	MOVE B,$E2	*print 1-9 to screen
	JMP end

lesstwe	MOVE #^49,A 	*1 in ASCII
print3	MOVE $E3,B	
	CMP #$0,B	*check if screen ready
	BEQ print3	*if not loop
	MOVE A,$E2	*print 1
	MOVE $F4,B	*fetch from memory
	ADD #^38,B	*convert unit to ASCII
	JMP screen

lessmax	MOVE #^50,A	*2 in ASCII
	MOVE A,$E2	 *print 2
print4	MOVE $E3,B	
	CMP #$0,B	 *check if screen ready
	BEQ print4          *if not loop	
	MOVE A,$E2	*if screen ready print 2
	MOVE $F4,B	*fetch from memory
	ADD #^28,B	*convert unit to ASCII
	JMP screen

screen	MOVE $E3,A	
	CMP #$0,A	*check if screen ready
	BEQ screen	*if not loop
	MOVE B,$E2	*print unit to screen
	JMP end

end	HALT




```
