<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\kustra88JustifyType;
use kustra88\Tools\Justify;
class kustra88JustifyController extends Controller
{
    /**
     * @Route("/kustra88/justify/show/form", name="kustra88_justify_show_form")
     */
    public function showFormAction()
    {
        $justify = new Justify();
        $form = $this->createCreateForm($justify);
        return $this->render(
            'AppBundle:kustra88Justify:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * @Route("/kustra88/justify/przetworz", name="kustra88_justify_wynik")
     * @Method("POST")
     */
    public function calculateAction(Request $request)
    {
        $justify = new Justify();
        $form = $this->createCreateForm($justify);
        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->render(
                'AppBundle:kustra88Justify:wynik.html.twig',
                array('wynik' => $justify->wynik())
            );
        }
        return $this->render(
            'AppBundle:kustra88Justify:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * Creates a form...
     *
     * @param Justify $justify The object
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Justify $justify)
    {
        $form = $this->createForm(new kustra88JustifyType(), $justify, array(
            'action' => $this->generateUrl('kustra88_justify_wynik'),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Justify'));
        return $form;
    }
}