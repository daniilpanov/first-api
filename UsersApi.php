<?php
class UsersApi extends Api
{
    public $apiName = 'users';

    /**
     * Метод GET
     * Вывод списка всех записей
     * http://ДОМЕН/users
     * @return string
     */
    public function indexAction()
    {
        return $this->response(["users" => [1 => "User1", 2 => "User2"]], 200);
        //return $this->response('Data not found', 404);
    }

    /**
     * Метод GET
     * Просмотр отдельной записи (по id)
     * http://ДОМЕН/users/1
     * @return string
     */
    public function viewAction()
    {
        //id должен быть первым параметром после /users/x
        $id = array_shift($this->requestUri);

        return $this->response(["user" => $id], 200);
        //return $this->response('Data not found', 404);
    }

    /**
     * Метод POST
     * Создание новой записи
     * http://ДОМЕН/users + параметры запроса name, email
     * @return string
     */
    public function createAction()
    {
        $name = $this->requestParams['name'] ?? '';
        $email = $this->requestParams['email'] ?? '';
        return $this->response('Data saved.', 200);
        //return $this->response("Saving error", 500);
    }

    /**
     * Метод PUT
     * Обновление отдельной записи (по ее id)
     * http://ДОМЕН/users/1 + параметры запроса name, email
     * @return string
     */
    public function updateAction()
    {
        $parse_url = parse_url($this->requestUri[0]);
        $userId = $parse_url['path'] ?? null;

        //return $this->response("User with id=$userId not found", 404);
        $name = $this->requestParams['name'] ?? '';
        $email = $this->requestParams['email'] ?? '';

        return $this->response('Data updated.', 200);
        //return $this->response("Update error", 400);
    }

    /**
     * Метод DELETE
     * Удаление отдельной записи (по ее id)
     * http://ДОМЕН/users/1
     * @return string
     */
    public function deleteAction()
    {
        $parse_url = parse_url($this->requestUri[3]);
        $userId = $parse_url['path'] ?? null;

        //return $this->response("User with id=$userId not found", 404);
        return $this->response('Data deleted.', 200);
        //return $this->response("Delete error", 500);
    }

}