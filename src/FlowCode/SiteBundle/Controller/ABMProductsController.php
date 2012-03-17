<?php

namespace FlowCode\SiteBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FlowCode\SiteBundle\Entity\Product;
use FlowCode\SiteBundle\Form\Type\ProductType;

class ABMProductsController extends Controller
{
    
    public function newProductAction(Request $request)
    {
        $product = new Product();
        $form = $this->createForm(new ProductType(), $product);
        
        $result = $this->render('SiteBundle:ABMProducts:newProduct.html.twig', 
                                array(
                                      'form' => $form->createView(),
                                     )
                               );
        
        if ($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);
            
            if ($form->isValid())
            {
                // Save the product.
                
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($product);
                $em->flush();
                
                $result = $this->render('SiteBundle:ABMProducts:showProduct.html.twig', 
                                        array(
                                            'form' => $form->createView(),
                                            )
                                    );
            }
            else
            {
                throw new exception ("No se puede guardar el producto.  Formulario inválido.");
            }            
        }
        
        return $result;
        
    } // newProductAction
    
} // ABMProductsController

