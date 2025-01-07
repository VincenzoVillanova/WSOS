package edu.unict.magazzino.demo.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import edu.unict.magazzino.demo.Model.Magazzino;
import edu.unict.magazzino.demo.Repository.MagazzinoRepository;

@Controller
@RequestMapping("/orders")
public class MagazzinoController {

    private final MagazzinoRepository repo;

    public MagazzinoController(MagazzinoRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/")
    public String getallorders(Model model) {
        model.addAttribute("orders", repo.findAll());
        return "index"; // Visualizza la lista degli ordini
    }

    @GetMapping("/edit")
    public String editOrder(@RequestParam("id") Long id, Model model) {
        Magazzino order = repo.findById(id).orElseThrow(() -> new IllegalArgumentException("Ordine non trovato"));
        model.addAttribute("order", order);
        return "update"; // Mostra la pagina di modifica
    }

    @PostMapping("/insert")
    public String postMethodName(@ModelAttribute Magazzino m) {
        repo.save(m); // Aggiungi un nuovo ordine
        return "redirect:/orders/"; // Ritorna alla lista degli ordini
    }

    @PostMapping("/form")
    public String postMethodName2(@RequestParam("id") Long id, @RequestParam("action") String action) {
        if (action.equals("Elimina")) {
            repo.deleteById(id); // Elimina l'ordine
        }
        return "redirect:/orders/"; // Ritorna alla lista degli ordini
    }

    @PostMapping("/update")
    public String updateOrder(@ModelAttribute Magazzino order) {
        repo.save(order); // Aggiorna l'ordine
        return "redirect:/orders/"; // Ritorna alla lista degli ordini
    }
}
