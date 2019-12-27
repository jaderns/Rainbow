<?php

namespace App\Model;

class Commande
{
    private $id_commande;
    private $id_client;
    private $id_produit;
    private $etat;
    private $created_at;

    public function __construct(int $id_commande, int $id_client, int $id_produit, $etat, \DateTimeInterface $created_at)
    {
        $this->id_commande = $id_commande;
        $this->id_client = $id_client;
        $this->id_produit = $id_produit;
        $this->etat = $etat;
        $this->created_at = $created_at;
    }

    public function id_commande() : int
    {
        return $this->id_commande;
    }

    public function id_client() : int
    {
        return $this->id_client;
    }

    public function id_produit() : int
    {
        return $this->id_produit;
    }

    public function etat() : int
    {
        return $this->etat;
    }

    public function created_at()
    {
        return $this->created_at;
    }



}
