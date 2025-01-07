package unict.dmi.biblioteca.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import unict.dmi.biblioteca.model.Libro;
import unict.dmi.biblioteca.repository.RepositoryLibri;

@Controller
@RequestMapping("/")
public class controllerLibri {

    private final RepositoryLibri repo;

    public controllerLibri(RepositoryLibri repo) {
        this.repo = repo;
    }

    @GetMapping("/")
    public String getLibri(Model model) {
        model.addAttribute("libri", repo.findAll());
        return "index";
    }

    @PostMapping("/update")
    public String aggiornamento(Libro obj) {
        repo.save(obj);
        return "redirect:/";
    }

    @PostMapping("/elimina")
    public String elimina(long id) {
        repo.deleteById(id);
        return "redirect:/";
    }

    @PostMapping("/modifica")
    public String getformmodifica(long id, Model model) {
        model.addAttribute("libro", repo.getReferenceById(id));
        return "modifica";
    }

}
