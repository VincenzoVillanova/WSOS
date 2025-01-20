package unict.dmi.moda.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

import unict.dmi.moda.Model.Brand;
import unict.dmi.moda.Repository.AbbigliamentoRepository;
import unict.dmi.moda.Repository.BrandRepository;

@Controller
public class BrandController {

    private BrandRepository repob;
    private AbbigliamentoRepository repoa;

    public BrandController(BrandRepository repob, AbbigliamentoRepository repoa) {
        this.repob = repob;
        this.repoa = repoa;
    }

    @GetMapping("/brand")
    public String getList(Model model) {
        model.addAttribute("brands", repob.findAll());
        return "/brand/list";
    }

    @PostMapping("/brand/update")
    public String update(Brand obj) {
        repob.save(obj);
        return "redirect:/brand";
    }

    @PostMapping("/brand/elimina")
    public String delete(@RequestParam long id) {
        repob.deleteById(id);
        return "redirect:/brand";
    }

    @PostMapping("/brand/filter")
    public String filter(@RequestParam long search, Model model) {
        Brand obj = repob.getReferenceById(search);
        model.addAttribute("abbigliamentos", repoa.findByBrandId(obj));
        return "/abbigliamento/list";
    }

    @PostMapping("/brand/modifica")
    public String edit(Model model, @RequestParam long id) {
        model.addAttribute("brand", repob.getReferenceById(id));
        return "/brand/edit";
    }
}
