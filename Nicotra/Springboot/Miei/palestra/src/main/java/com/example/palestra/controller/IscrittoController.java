package com.example.palestra.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import com.example.palestra.model.Iscritto;
import com.example.palestra.model.Palestra;
import com.example.palestra.repository.IscrittoRepository;
import com.example.palestra.repository.PalestraRepository;

@Controller
public class IscrittoController {

    private final IscrittoRepository repoi;
    private final PalestraRepository repop;

    public IscrittoController(IscrittoRepository repoi, PalestraRepository repop) {
        this.repoi = repoi;
        this.repop = repop;
    }

    @GetMapping("/iscritto")
    public String getMethodName(Model model) {
        model.addAttribute("iscritti", repoi.findAll());
        model.addAttribute("palestre", repop.findAll());
        return "iscritti/list";
    }

    @PostMapping("/iscritto/new")
    public String update(Model model, Iscritto iscritto) {
        repoi.save(iscritto);
        return "redirect:/iscritto";
    }

    @PostMapping("/iscritto/elimina")
    public String delete(long id) {
        repoi.deleteById(id);
        return "redirect:/iscritto";
    }

    @PostMapping("/iscritto/modifica")
    public String edit(Model model, long id) {
        model.addAttribute("iscritto", repoi.getReferenceById(id));
        model.addAttribute("palestre", repop.findAll());
        return "iscritti/edit";
    }

    @PostMapping("/iscritto/ricerca")
    public String ricerca(Model model, long id) {
        Palestra obj = repop.getReferenceById(id);
        model.addAttribute("iscritti", repoi.findByPalestraId(obj));
        model.addAttribute("palestre", repop.findAll());
        return "iscritti/list";
    }

}
