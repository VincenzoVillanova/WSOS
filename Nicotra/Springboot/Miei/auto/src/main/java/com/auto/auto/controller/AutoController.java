package com.auto.auto.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import com.auto.auto.model.Auto;
import com.auto.auto.repository.AutoRepository;

@Controller
@RequestMapping("/")
public class AutoController {

    private final AutoRepository repo;

    public AutoController(AutoRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/")
    public String getHome(Model model) {
        model.addAttribute("cars", repo.findAll());
        return "index";
    }

    @PostMapping("/update")
    public String update(Auto obj) {
        repo.save(obj);
        return "redirect:/";
    }

    @PostMapping("/elimina")
    public String delete(Long id) {
        repo.deleteById(id);
        return "redirect:/";
    }

    @PostMapping("/modifica")
    public String modifica(Model model, Long id) {
        model.addAttribute("car", repo.getReferenceById(id));
        return "modifica";
    }

}
