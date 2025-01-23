package unict.dmi.moda.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

import unict.dmi.moda.Model.Abbigliamento;
import unict.dmi.moda.Repository.AbbigliamentoRepository;
import unict.dmi.moda.Repository.BrandRepository;

@Controller
public class AbbigliamentoController {

    private AbbigliamentoRepository repoa;
    private BrandRepository repob;

    public AbbigliamentoController(AbbigliamentoRepository repoa, BrandRepository repob) {
        this.repoa = repoa;
        this.repob = repob;
    }

    @GetMapping("/abbigliamento")
    public String getList(Model model) {
        model.addAttribute("abbigliamentos", repoa.findAll());
        model.addAttribute("brands", repob.findAll());
        return "/abbigliamento/list";
    }

    @PostMapping("/abbigliamento/update")
    public String update(Abbigliamento obj) {
        repoa.save(obj);
        return "redirect:/abbigliamento";
    }

    @PostMapping("/abbigliamento/elimina")
    public String delete(@RequestParam long id) {
        repoa.deleteById(id);
        return "redirect:/abbigliamento";
    }

    @PostMapping("/abbigliamento/modifica")
    public String edit(Model model, @RequestParam long id) {
        model.addAttribute("abbigliamento", repoa.getReferenceById(id));
        model.addAttribute("brands", repob.findAll());
        return "/abbigliamento/edit";
    }

    @PostMapping("/abbigliamento/search")
    public String search(Model model, @RequestParam String nome) {
        model.addAttribute("abbigliamentos", repoa.findByNome(nome));
        model.addAttribute("brands", repob.findAll());
        return "/abbigliamento/list";
    }

}
