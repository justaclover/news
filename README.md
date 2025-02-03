<h2>Описание</h2>
<p>Небольшой REST API, созданный в ходе изучения PHP и Laravel и самой концепции REST в принципе</p>
<p>Запускается на localhost. При разработке база данных MySql и сервер разворачивались через XAMPP. Необходимые миграции для создания БД уже лежат в проекте в database/migrations</p>
<p>Все маршруты вида <b>http://localhost/news/public/api-news/{ручка}</b></p>
<p>Использовалась стандартная структура Laravel-проектов.</p>

<h2>Ручки и функционал</h2>
<h3>POST /signup</h3>
<p>Для регистрации пользователя</p> 
<p>Требуемое тело запроса: json { "login": "string", "password": "string", "lastName": "string", "birthDate": "YYYY-MM-DD"}</p>

<h3>POST /signin</h3>
<p>Для авторизации пользователя</p>
<p>Требуемое тело запроса: json { "login": "string", "password": "string"}</p>

<h3>POST /post</h3>
<p>Для добавления постов</p>
<p>Требуемое тело запроса: json { "title": "string", "content": "string", "image": "string (URL)", "createdAt":"YYYY-MM-DDTHH:mm:ss" }</p>
<p>Требуется Bearer-token.</p>

<h3>GET /post/{id}</h3>
<p>Для просмотра информации об одном посте</p>
<p>Тело не принимается.</p>
<p>Требуется Bearer-token.</p>

<h3>PUT /post/{id}</h3>
<p>Для изменения информации о посте.</p>
<p>Требуемое тело запроса: json { "title": "string (optional)", "content":"string (optional)", "image": "string (optional, URL)", "createdAt": "optional, YYYY-MM-DDTHH:mm:ss" }</p>
<p>Требуется Bearer-token.</p>
<p><b>При переходе по ручке с помощью Postman запрос PUT может не сработать! Этого баг самого Postman! Лучше ставить метод запроса POST, а параметрах запроса указать _method=PUT</b></p>

<h3>DELETE /post/{id}</h3>
<p>Для удаления информации о посте.</p>
<p>Тело не принимается.</p>
<p>Требуется Bearer-token.</p>
