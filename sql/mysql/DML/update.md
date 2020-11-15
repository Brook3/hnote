# 1. update
```sql
update person_income_add_up au 
inner JOIN employee_pro ep on au.employee_pro_id = ep.id 
set au.id_card = ep.id_card
```