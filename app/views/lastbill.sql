SELECT *
FROM bills
WHERE category = "Gas"
AND date < "2015-07-22 00:00:00"
AND deleted = 0
ORDER BY date DESC, id DESC

$db->order_by([
	"date" => "desc",
	"id" => "desc"
]);