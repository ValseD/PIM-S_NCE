<?php
    namespace App\Controller;

    use App\Entity\Product;

    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use \Datetime;
    
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
    use Symfony\Component\Form\Extension\Core\Type\FileType;


    class ProductController extends Controller {
        /**
         *  @Route("/", name="product_root")
         *  @Method({"GET"})
         */
        public function index() {

          return $this->redirectToRoute('product_list');

        ////  $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
        //    $products = $this->getDoctrine()->getRepository(Product::class)->findBy([], ['creationDate' => 'ASC']);

        //    return $this->render('products/index.html.twig', array('products'=> $products));
        }

        
        /**
         * @Route("/product", name="get_product_img")
         * Method({"GET"})
        */
        public function img() {

          // return $this->render('products/'); 
          return $this->redirectToRoute('get_product_img'); 
     }

        /**
         * @Route("/product/list", name="product_list")
         * @Method({"GET"})
        */

        public function list() {

            $products = $this->getDoctrine()->getRepository(Product::class)->findBy([], ['creationDate' => 'ASC']);

            return $this->render('products/index.html.twig', array('products'=> $products));
        }


        /**
         * @Route("/product/create", name="create_product")
         * Method({"GET", "POST"})
        */
        
        public function create(Request $request) {
            $product = new Product();

            $form = $this->createFormBuilder($product)
            ->add('name', TextType::class, array(
                'required' => true,
                'attr' => array('class' => 'form-control')
            ))
            ->add('description', TextareaType::class, array(
              'required' => true,
              'attr' => array('class' => 'form-control')
            ))
            ->add('TAGS', TextareaType::class, array(
                'required' => true,
                'data' => 'STANDARD',
                'attr' => array('class' => 'form-control')
            ))
            ->add('CreationDate', DateTimeType::class, array(
                'date_label' => 'Created On',
                'required' => true,
                'attr' => array('class' => 'input-group date')
              ))        

            ->add('imgURL', FileType::class, array(
              'label' => 'Image (png, jpeg)',
              'attr' => array('class'=> 'form-control-file')
            )) 
            
            ->add('save', SubmitType::class, array(
              'label' => 'Create',
              'attr' => array('class' => 'btn btn-primary mt-3')
            ))
            ->getForm();

            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()) {

              $file = $product->getImgURL(); 
              $fileName = md5(uniqid()).'.'.$file->guessExtension(); 
              $file->move($this->getParameter('product_image'), $fileName); 
              $product->setImgURL($fileName); 
                  
              $product = $form->getData();
              $entityManager = $this->getDoctrine()->getManager();
              $entityManager->persist($product);
              $entityManager->flush();
              return $this->redirectToRoute('product_list');
            }
      

            return $this->render('products/create.html.twig', array(
                'form' => $form->createView()
              ));
    
        }

        /**
          * @Route("/product/save")
        */

        public function save() {
            $dt = new DateTime();
            $dt->format('Y-m-d H:i:s');

            $entityManager = $this->getDoctrine()->getManager();
            $product = new Product();
            $product->setName('Product Two');
            $product->setDescription('This is the description for article two');
            $product->setCreationDate($dt);
            $entityManager->persist($product);
            $entityManager->flush();
            return new Response('Saved a product with the id of  '.$product->getId());
        }

        /**
         * @Route("/product/{id}/edit", name="product_edit")
         * Method({"GET", "POST"})
         */
        public function edit(Request $request, $id) {
           
          $product = new Product();
          $product = $this->getDoctrine()->getRepository(Product::class)->find($id); 
            
            $form = $this->createFormBuilder($product)
            ->add('name', TextType::class, array(
                'required' => true,
                'attr' => array('class' => 'form-control')
            ))
            ->add('description', TextareaType::class, array(
              'required' => true,
              'attr' => array('class' => 'form-control')
            ))
            ->add('TAGS', TextareaType::class, array(
                'required' => true,
                'data' => 'STANDARD',
                'attr' => array('class' => 'form-control')
            ))
            ->add('CreationDate', DateTimeType::class, array(
                'date_label' => 'Created On',
                'required' => true,
                'attr' => array('class' => 'input-group date')
              ))        
          ->add('save', SubmitType::class, array(
              'label' => 'Update',
              'attr' => array('class' => 'btn btn-primary mt-3')
            ))
            ->getForm();



            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()) {

              $file = $product->getImgURL(); 
              $fileName = md5(uniqid()).'.'.$file->guessExtension(); 
              $file->move($this->getParameter('product_image'), $fileName); 
              $product->setImgURL($fileName); 
                  
            //$product = $form->getData();
              $entityManager = $this->getDoctrine()->getManager();
            //  $entityManager->persist($product);
              $entityManager->flush();
              return $this->redirectToRoute('product_list');
            }
      

            return $this->render('products/edit.html.twig', array(
                'form' => $form->createView()
              ));
    
            

            //return $this->render('products/edit.html.twig', array('product' => $product));
        }


    }
