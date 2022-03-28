def is_prime(N):
    a = N
    while N > 1:
        b = N-1
        if b > 1:
        	if (a % b) == 0:
            	return print("Is Not Prime")
        elif N == 2:
            return print("Is A Prime")
        N -= 1
print(is_prime(3))