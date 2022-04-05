# ToDoList на Laravel
![](images/interface.png)

## Устнаовка
### 1 Скачайте и установите Open Server
https://ospanel.io/

### 2 Зайдипе в папку \openserver\domains и скачайте проект
```bash
git clone https://github.com/MindYume/Laravel-ToDoList.git
```
### 3 Запустите Open Server, и зайдите в настройки
![](images/settings.png)
### 4 В настройках зайдите в раздел "Домены" и добавтье домен с любым именем
![](images/domain1.png)
![](images/domain2.png)
![](images/domain3.png)

### 5 Создайте базу данных из миграций. 
Для этого запуствите консоль через Open Server, зайдите в папку с проектам и запустите следующую команду
```bash 
php artisan migrate
```
![](images/migration.png)
### 6 Теперь вы пожете запустить Open Server и в любом браузере ввести название домена, котрое вы дали проекту, и посмотреть на результат.
![](images/domain4.png)
