package com.unict.esami.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import com.unict.esami.model.Esami;
import com.unict.esami.repository.EsamiRepository;

@Controller
@RequestMapping("/")
public class EsamiController {

    private final EsamiRepository repo;

    public EsamiController(EsamiRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/")
    public String getHome(Model model) {
        model.addAttribute("esami", repo.findAll());
        return "index";
    }

    @PostMapping("/modifica")
    public String modifica(Model model, long id) {
        model.addAttribute("esame", repo.getReferenceById(id));
        return "modifica";
    }

    @PostMapping("/update")
    public String update(Esami obj) {
        repo.save(obj);
        return "redirect:/";
    }

    @PostMapping("/elimina")
    public String update(long id) {
        repo.deleteById(id);
        return "redirect:/";
    }

}
