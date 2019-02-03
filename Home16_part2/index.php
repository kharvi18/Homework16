SELECT * FROM `block`
WHERE block.theme LIKE 'bartik' AND block.module LIKE 'system'
ORDER BY block.bid

SELECT * FROM `field_data_field_date`
WHERE field_data_field_date.field_date_value= '2018-06-18T00:00:00' AND field_data_field_date.bundle= 'delivery' AND field_data_field_date.entity_id>8

SELECT * FROM `field_data_field_driver`
WHERE bundle = 'cars' and field_driver_value LIKE '%Сергей%'

SHOW tables like 'cache%'