A turing machine which takes two binary numbers separated by a space and adds them.
Eg, 10101 11101 
![image](https://user-images.githubusercontent.com/87831546/144908397-dff8e3f4-1d01-4462-811e-0d833c7aaa49.png)

The machine works for adding any combination of any length of binary numbers. The turing machine has an inital state of 0

```
0 0 0 r 0
0 1 1 r 0              ;state 0 – moving to end of first number
0 _ _ r 1		  ;reached end of first number
1 1 1 r 1
1 0 0 r 1	  ;state 1 – moving to end of second number
1 _ _ l 2		;reached end of second number
2 1 0 l 4 	;if 1 subtract 1 then go straight to left number
2 0 1 l 3 	;if 0 write 1 then carry left
3 1 0 l 4		;if 1 then subtraction complete go to left number
3 0 1 l 5		;for the extra carry (for 3+ digit binary numbers)
3 _ _ r 8		;dealing with one digit binary numbers (adding 1 or 0)
4 1 1 l 4
4 0 0 l 4		;state 4 – moving to furthest right digit of left number (to add one)
4 _ _ l 6		;reached furthest right digit of left number
5 1 0 l 4		;state 5 – for 3+ bit numbers subtract 1
5 0 1 l 5 	;loop through right number changing all to 1s
5 _ _ r 7		;all subtraction has been done (all 1s in right number)
6 0 1 r 0	    ;if 0 add one, loop back to start
6 1 0 l 6		  ;if 1 write 0 carry 1 left and loop
6 _ 1 r 0		  ;carrying 1 all the way to end, loop back to start
7 1 _ r 7		  ;second binary number is all 1 so delete
7 _ _ * halt	;left with only the product
8 1 _ * halt	;adding 1 digit so complete already

```
