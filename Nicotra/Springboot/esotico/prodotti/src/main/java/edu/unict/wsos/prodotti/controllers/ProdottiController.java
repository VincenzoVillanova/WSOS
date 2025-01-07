package edu.unict.wsos.prodotti.controllers;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import edu.unict.wsos.prodotti.data.ProdottiRepository;
import edu.unict.wsos.prodotti.models.Prodotti;

@Controller
@RequestMapping("/")
public class ProdottiController {

    private final ProdottiRepository repo;

    public ProdottiController(ProdottiRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/")
    public String getProdotti(Model model) {
        model.addAttribute("product", repo.findAll()); // Passa "product" al modello
        return "index";
    }

    @PostMapping("/insert")
    public String insertProdotto(Prodotti prodotto) {
        repo.save(prodotto); // Salva il nuovo prodotto
        return "redirect:/";
    }

    @PostMapping("/delete")
    public String deleteProdotto(@RequestParam Long id) {
        repo.deleteById(id); // Elimina il prodotto per ID
        return "redirect:/";
    }

    @PostMapping("/update")
    public String updateProdotto(@RequestParam Long id, @RequestParam String nomeProdotto, @RequestParam Double prezzoProdotto) {
        Prodotti prodotto = repo.findById(id).orElseThrow();
        prodotto.setNomeProdotto(nomeProdotto); // Aggiorna il nome
        prodotto.setPrezzoProdotto(prezzoProdotto); // Aggiorna il prezzo
        repo.save(prodotto); // Salva le modifiche
        return "redirect:/";
    }
}
