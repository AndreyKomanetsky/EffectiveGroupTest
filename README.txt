1 и 3 задания были выполнены в одном файле файле index.php Так же для 3 задания был создан файл generator.php в котором содержаться классы.
Ко второму заданию прилагаю схему базы данных SchemaTask2.png На этой схеме отображено, что таблица авторов и книг соеденины связью "многие-
-ко-многим" при помощи вспомогательной таблицы "authorsbooks". Связи на схеме "authors---1-to-many---authorsbooks---many-to-1---books". 

Запрос на вывод авторов, у которых больше 6 книг представлен ниже

SELECT author, count(b_id) as how_much from authorsbooks 
    join authors on authors.a_id=authorsbooks.authors_id 
    join books on books.b_id=authorsbooks.books_id 
    group by a_id having how_much <=6;