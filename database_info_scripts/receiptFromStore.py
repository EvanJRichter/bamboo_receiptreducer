import sys
from random import randint

array_receipt_ID = []
array_store_ID  = []

file = open('receipt.csv', 'r') 

for line in file:
	receipt_ID, timeDate, pretax, price = line.split(';')
	array_receipt_ID.append(receipt_ID)

file.close()

file = open('store.csv', 'r') 

for line in file:
	store_ID, name, location = line.split(';')
	array_store_ID.append(store_ID)

file.close()

file = open('receiptFromStore.csv', 'w') 
i = 0

for x in array_receipt_ID:
	assigned_store_ID = array_store_ID[randint(0,len(array_store_ID)-1)]

	file.write (array_receipt_ID[i] + ';' )
	file.write (assigned_store_ID + '\n')

	i = i + 1

file.close()