package com.prova.giocatori.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import com.prova.giocatori.model.Giocatore;
import com.prova.giocatori.repository.GiocatoreRepository;

@Controller
@RequestMapping("/giocatori")
public class ControllerGiocatori {

    private final GiocatoreRepository repo;

    public ControllerGiocatori(GiocatoreRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/")
    public String getHome() {
        return "index";
    }

    @GetMapping("/lista")
    public String visualizzazione2(Model model) {
        model.addAttribute("giocatori", repo.findAll());
        return "lista";
    }

    @PostMapping("/inserisci")
    public String inserisci(Model model) {
        model.addAttribute(new Giocatore());
        return "inserimento";
    }

    @PostMapping("/lista")
    public String visualizzazione(Model model) {
        model.addAttribute("giocatori", repo.findAll());
        return "lista";
    }

    @PostMapping("/modifica")
    public String modifica(Model model, Long id) {
        model.addAttribute("giocatore", repo.getReferenceById(id));
        return "modifica";
    }

    @PostMapping("/elimina")
    public String elimina(Long id) {
        repo.deleteById(id);
        return "redirect:/giocatori/lista";
    }

    @PostMapping("/aggiornamento")
    public String aggiornamento(Giocatore gio) {
        repo.save(gio);
        return "redirect:/giocatori/lista";
    }

}
