/* Выполненно в postgres */
SELECT
	users."name", 
	count(phone_numbers.user_id)
FROM
	users
	INNER JOIN
	phone_numbers
	ON 
		users."id" = phone_numbers.user_id
WHERE
	users.birth_date >= (now()::timestamp - INTERVAL '22 years') AND
	users.birth_date <= (now()::timestamp - INTERVAL '18 years')
GROUP BY
	users."id"