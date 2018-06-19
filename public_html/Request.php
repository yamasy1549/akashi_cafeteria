<?php

require_once './Post.php';
require_once './QueryString.php';

/**
 * リクエストクラス
 */
class Request
{
    // POSTパラメータ
    private $post;
    // GETパラメータ
    private $query;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->post = new Post();
        $this->query = new QueryString();
    }

    /**
     * POST変数取得
     *
     * @param string $key パラメータ
     * @return string
     */
    public function getPost($key = null)
    {
        if ($key == null) {
            return $this->post->get();
        }
        if ($this->post->has($key) == false) {
            return null;
        }

        return $this->post->get($key);
    }

    /**
     * GET変数取得
     *
     * @param string $key パラメータ
     * @return string
     */
    public function getQuery($key = null)
    {
        if ($key == null) {
            return $this->query->get();
        }
        if ($this->query->has($key) == false) {
            return null;
        }

        return $this->query->get($key);
    }
}
