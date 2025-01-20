package com.cani.cani.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

import com.cani.cani.Model.Cani;
import com.cani.cani.Repository.RepositoryCani;
import com.cani.cani.Repository.RepositoryProprietari;

@Controller
public class ControllerCani {

    private final RepositoryCani repoc;
    private final RepositoryProprietari repop;

    public ControllerCani(RepositoryCani repoc, RepositoryProprietari repop) {
        this.repoc = repoc;
        this.repop = repop;
    }

    @GetMapping("/cani")
    public String home(Model model) {
        model.addAttribute("cani", repoc.findAll());
        return "/cani/list";
    }

    @GetMapping("/cani/new")
    public String insert(Model model) {
        model.addAttribute("cane", new Cani());
        model.addAttribute("proprietari", repop.findAll());
        return "/cani/edit";
    }

    @GetMapping("/cani/{id}/edit")
    public String edit(Model model, @PathVariable long id) {
        model.addAttribute("cane", repoc.getReferenceById(id));
        model.addAttribute("proprietari", repop.findAll());
        return "/cani/edit";
    }

    @GetMapping("/cani/{id}/delete")
    public String delete(@PathVariable long id) {
        repoc.deleteById(id);
        return "redirect:/cani";
    }

    @PostMapping("/cani")
    public String update(Cani obj) {
        repoc.save(obj);
        return "redirect:/cani";
    }

    @PostMapping("/cani/search")
    public String search(@RequestParam String nome, Model model) {
        model.addAttribute("cani", repoc.findByNome(nome));
        return "/cani/list";

    }
}
