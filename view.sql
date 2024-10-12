// CREATE OR REPLACE VIEW itemsview AS
SELECT items.* , categories.* FROM items
INNER JOIN categories ON categories.categories_id = items.items_categories


//استعلام ضم معلومات الاقسام مع جدول المنتجات 






CREATE OR REPLACE VIEW myFavorite AS

SELECT favorite.* , items.* , users.id FROM favorite
INNER JOIN users ON users.id = favorite.favorite_userid
INNER JOIN items ON items.items_id = favorite.favorite_itemsid

// استعلام عمل جدول الوهمي الذي يحتوي علي عناصر جدول المفضلة عناصر جدول المنتجات و رقم المستخدم






SELECT SUM(items.items_price) AS itemsprice , COUNT(cart_users_id) AS countitems , cart.* , items.* FROM cart 
INNER JOIN 
items ON items.items_id = cart.cart_items_id 
GROUP BY 
cart.cart_items_id , cart.cart_users_id;

// استعلام يقوم بجلب بيانات الجدولين المنتجات وجدول السلة ولكن يقوم بجمع عدد المنتجات المتشابهة وسعرها


CREATE OR REPLACE VIEW cart_view AS
SELECT SUM(items.items_price - items.items_price * items.offers / 100) AS itemsprice , COUNT(cart.cart_items_id) AS totalitems, cart.* , items.* FROM cart
INNER JOIN items ON items.items_id = cart.cart_items_id
GROUP BY cart.cart_id , cart.cart_users_id , cart.card_orders




CREATE OR REPLACE VIEW orderDetailsView AS 
SELECT SUM(items.items_price - items.items_price* items.offers / 100) as totalPrice , COUNT(cart.cart_items_id) as totalItems , cart.* , items.* , orderview.* FROM cart
INNER JOIN items ON items.items_id = cart.cart_items_id
INNER JOIN orderview ON orderview.orders_id = cart.card_orders
WHERE card_orders != 0
GROUP BY cart.cart_items_id , cart.cart_users_id , cart.card_orders