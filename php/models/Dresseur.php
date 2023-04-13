<?php 

class Dresseur {

    private $nickname;
    private $score;


    public function __construct( $nickname, $score) {
        $this->nickname = $nickname;
        $this->score = $score;
    }


    public function getUserName(): string {
        return $this->nickname;
    }

    public function getScore(): int {
        return $this->score;
    }

    public function augmenterScore(): void {
        $this->score += 3;
    }
}