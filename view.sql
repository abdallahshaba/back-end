// CREATE OR REPLACE VIEW itemsview AS
SELECT items.* , categories.* FROM items
INNER JOIN categories ON categories.categories_id = items.items_categories


// استعلام ضم معلومات الاقسام داخل جدول العناصر






CREATE OR REPLACE VIEW myFavorite AS

SELECT favorite.* , items.* , users.id FROM favorite
INNER JOIN users ON users.id = favorite.favorite_userid
INNER JOIN items ON items.items_id = favorite.favorite_itemsid

// استعلام عمل جدول الوهمي الذي يحتوي علي عناصر جدول المفضلة عناصر جدول المنتجات و رقم المستخدم