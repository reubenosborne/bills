SELECT name 
FROM bills, accounts, users 
WHERE bills.id = '25' 
AND bills.id = accounts.bill_id 
AND accounts.user_id = users.id 
AND accounts.paid = '1' 
AND accounts.confirmed = '0'



->where('bills.id', 'accounts.bill_id')
AND bills.id = 'accounts.bill_id'



->where('bills.id', 'accounts.bill_id', false)
AND bills.id = accounts.bill_id