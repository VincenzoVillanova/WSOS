package com.cani.cani.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;

import com.cani.cani.Model.Proprietari;
import com.cani.cani.Repository.RepositoryCani;
import com.cani.cani.Repository.RepositoryProprietari;

@Controller
public class ControllerProprietari {

    private final RepositoryProprietari repop;
    private final RepositoryCani repoc;

    public ControllerProprietari(RepositoryProprietari repop, RepositoryCani repoc) {
        this.repop = repop;
        this.repoc = repoc;
    }

    @GetMapping("/proprietari")
    public String home(Model model) {
        model.addAttribute("proprietari", repop.findAll());
        return "/proprietari/list";
    }

    @GetMapping("/proprietari/new")
    public String insert(Model model) {
        model.addAttribute("proprietario", new Proprietari());
        return "/proprietari/edit";
    }

    @GetMapping("/proprietari/{id}/edit")
    public String edit(Model model, @PathVariable long id) {
        model.addAttribute("proprietario", repop.getReferenceById(id));
        return "/proprietari/edit";
    }

    @GetMapping("/proprietari/{id}/delete")
    public String delete(@PathVariable long id) {
        repop.deleteById(id);
        return "redirect:/proprietari";
    }

    @GetMapping("proprietari/{id}/search")
    public String getMethodName(@PathVariable long id, Model model) {
        model.addAttribute("cani", repoc.findByProprietario_Id(id));
        return "/cani/list";
    }

    @PostMapping("/proprietari")
    public String update(Proprietari obj) {
        repop.save(obj);
        return "redirect:/proprietari";
    }
}
