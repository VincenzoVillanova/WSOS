package com.example.palestra.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import com.example.palestra.model.Palestra;
import com.example.palestra.repository.PalestraRepository;

@Controller
public class PalestraController {

    private final PalestraRepository repop;

    public PalestraController(PalestraRepository repop) {
        this.repop = repop;
    }

    @GetMapping("/palestra")
    public String select(Model model) {
        model.addAttribute("palestre", repop.findAll());
        return "palestre/list";
    }

    @PostMapping("/palestra/new")
    public String update(Model model, Palestra palestra) {
        repop.save(palestra);
        return "redirect:/palestra";
    }

    @PostMapping("/palestra/elimina")
    public String delete(Model model, long id) {
        repop.deleteById(id);
        return "redirect:/palestra";
    }

    @PostMapping("/palestra/modifica")
    public String edit(Model model, long id) {
        model.addAttribute("palestra", repop.getReferenceById(id));
        return "palestre/edit";
    }

}
