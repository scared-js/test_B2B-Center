<?php
    /**
     * @param array $user_ids
     * @return array
     */
    function load_users_data($user_ids): array
    {
        $db = pg_connect("host=localhost port=5432 dbname=test user=test password=test");

        $user_ids = '{' . $user_ids . '}';
        /* Сделал защиту от sql иньекций, а так же один большой запрос, на много быстрее кучи маленьких  */
        $query = 'SELECT id,name FROM users WHERE id = ANY ($1)';
        $result = pg_query_params($query, array($user_ids));

        $data = [];
        while ($item = pg_fetch_object($result)) {
            $data[$item->id] = $item->name;
        }
        pg_close($db);
        return $data;
    }

    $data = load_users_data($_GET['user_ids']);
    foreach ($data as $key => $item) {
        /* Еще одно место для возможных sql иньекций  */
        echo "<a href=\"/show_user.php?id=$key\">" . htmlspecialchars($item) . "</a>";
    }