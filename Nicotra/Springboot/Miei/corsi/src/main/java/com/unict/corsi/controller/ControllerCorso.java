package com.unict.corsi.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import com.unict.corsi.data.RepositoryCorsi;
import com.unict.corsi.model.Corso;

@Controller
@RequestMapping("/")
public class ControllerCorso {

    private final RepositoryCorsi repo;

    public ControllerCorso(RepositoryCorsi repo) {
        this.repo = repo;
    }

    @GetMapping("/")
    public String getCorsi(Model model) {
        model.addAttribute("corsi", repo.findAll());
        return "index";
    }

    @PostMapping("/modifica")
    public String modifica(Long id, Model model) {
        model.addAttribute("corso", repo.getReferenceById(id));
        return "modifica";
    }

    @PostMapping("/update")
    public String update(Corso obj) {
        repo.save(obj);
        return "redirect:/";
    }

    @PostMapping("/elimina")
    public String delete(Long id) {
        repo.deleteById(id);
        return "redirect:/";
    }
}
