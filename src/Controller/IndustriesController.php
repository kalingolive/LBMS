<?php

namespace App\Controller;

use App\Entity\Industries;
use App\Form\IndustriesType;
use App\Repository\IndustriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
/**
 * @Route("/industries")
 */
class IndustriesController extends AbstractController
{
    /**
     * @Route("/", name="industries_index", methods={"GET"})
     */
    public function index(IndustriesRepository $industriesRepository): Response
    {
        return $this->render('industries/index.html.twig', [
            'industries' => $industriesRepository->findAll(),
        ]);
    }
	
	  /**
     * @Route("/export", name="export")
     */
    public function export(IndustriesRepository $industriesRepository)
    {
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setTitle('User List');
		$sheet->getCell('A1')->setValue('ተ.ቁ');
        $sheet->getCell('B1')->setValue('የኢንደስትሪው ስም');
		 $sheet->getCell('C1')->setValue('ቀበሌ ');
		 $sheet->getCell('D1')->setValue('ኢንደስትሪው የሚገኝበት/መንደር ');
		 $sheet->getCell('E1')->setValue('የቤት ቁጥር ');
		 $sheet->getCell('F1')->setValue('ስልክ ቁጥር ');
		 $sheet->getCell('G1')->setValue('የተመሰረተበት ዘመን(ዓ።ም) ');
		 $sheet->getCell('H1')->setValue('የተሰማራበት ኑኡስ ዘርፍ ');
		 $sheet->getCell('I1')->setValue('የተሰማራበት የስራ ዘርፍ ');
		 $sheet->getCell('J1')->setValue('የአደራጃጀት ዓይነት ');
		 $sheet->getCell('K1')->setValue('የግብር ከፋይነት መለያ ቁጥር ');
		 $sheet->getCell('L1')->setValue('ሲመሠረት የነበረው ካፒታል መጠን ');
		 $sheet->getCell('M1')->setValue('ምንጭ ');
		 $sheet->getCell('N1')->setValue('አሁን ያለው ካፒታል በጥሬ ገንዘብ ብር ');
		 $sheet->getCell('O1')->setValue('በቋሚና ተንቀሳቃሽ ንብረቶች ግምት ብር ');
		  $sheet->getCell('P1')->setValue('ድምር  ');
		 $sheet->getCell('Q1')->setValue('የእድገት  ደረጃ ');
		 $sheet->getCell('R1')->setValue('የኢንደስትሪው አባላት ብዛት ወንድ ');
		 $sheet->getCell('S1')->setValue('የኢንደስትሪው አባላት ብዛት ሴት  ');
		 $sheet->getCell('T1')->setValue('ድምር  '); 

		 $sheet->getCell('U1')->setValue('የኢንደስትሪው አባላት ብዛት ከ16-29 ');
		 $sheet->getCell('V1')->setValue('የኢንደስትሪው አባላት ብዛት ከ29 በላይ ');
		 $sheet->getCell('W1')->setValue('ድምር  ');
		 $sheet->getCell('X1')->setValue('የአካል ወንድ ');
		 $sheet->getCell('Y1')->setValue('የአካል ሴት ');
		 $sheet->getCell('Z1')->setValue('ድምር  ');
		 $sheet->getCell('AA1')->setValue('የኢንደስትሪው ስራ ሲጀምር የነበረው የሰው/ ሰራተኛ ብዛት ወንድ ');
		 $sheet->getCell('AB1')->setValue('የኢንደስትሪው ስራ ሲጀምር የነበረው የሰው/ ሰራተኛ ብዛት ሴት');
		  $sheet->getCell('AC1')->setValue('ድምር  ');
		 $sheet->getCell('AD1')->setValue('የኢንደስትሪው ስራ ሲጀምር የነበረው የሰው/ ቋሚ ቅጥር  ወንድ ');
		 $sheet->getCell('AE1')->setValue('የኢንደስትሪው ስራ ሲጀምር የነበረው የሰው/ ቋሚ ቅጥር ሴት ');
		 $sheet->getCell('AF1')->setValue('ድምር  ');
		 $sheet->getCell('AG1')->setValue('የኢንደስትሪው ስራ ሲጀምር የነበረው የሰው/ ጊዜያዊ ቅጥር ወንድ ');
		 $sheet->getCell('AH1')->setValue('የኢንደስትሪው ስራ ሲጀምር የነበረው የሰው/ ጊዜያዊ ቅጥር ሴት ');
		 $sheet->getCell('AI1')->setValue('ድምር  ');
		 $sheet->getCell('AJ1')->setValue('የኢንደስትሪው አሁን ያለው የሰው ኃይል የቤተሰብ አባላትን ጨምሮ/ ሰራተኛ ብዛት ወንድ ');
		 $sheet->getCell('AK1')->setValue('የኢንደስትሪው አሁን ያለው የሰው ኃይል የቤተሰብ አባላትን ጨምሮ/ ሰራተኛ ብዛት ሴት ');
		 $sheet->getCell('AL1')->setValue('ድምር  ');
		 $sheet->getCell('AM1')->setValue('የኢንደስትሪው አሁን ያለው የሰው ኃይል የቤተሰብ አባላትን ጨምሮ/ ቋሚ ቅጥር  ወንድ ');
		 $sheet->getCell('AN1')->setValue('የኢንደስትሪው አሁን ያለው የሰው ኃይል የቤተሰብ አባላትን ጨምሮ/ ቋሚ ቅጥር  ሴት ');
		 $sheet->getCell('AO1')->setValue('ድምር  ');
		 $sheet->getCell('AP1')->setValue('ኢንደስትሪው አሁን ያለው የሰው ኃይል የቤተሰብ አባላትን ጨምሮ/ ጊዜያዊ ቅጥር  ወንድ ');
		 $sheet->getCell('AQ1')->setValue('የኢንደስትሪው አሁን ያለው የሰው ኃይል የቤተሰብ አባላትን ጨምሮ/ ጊዜያዊ ቅጥር  ሴት ');
		 $sheet->getCell('AR1')->setValue('ድምር  ');
		  $from = "A1"; // or any value
		 $to = "AQ1"; // or any value
		 $sheet->getStyle("$from:$to")->getFont()->setBold( true );
        // Increase row cursor after header write
            $sheet->fromArray($this->getData( $industriesRepository),null, 'A2', true);
        

        ob_clean();
        $writer = new Xlsx($spreadsheet);

       // $writer->save('Industries report.xlsx');
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Industries report-collected verion.xlsx"');
        $writer->save('php://output');

        return $this->redirectToRoute('industries_index');
    }
    /**
     * @Route("/new", name="industries_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $industry = new Industries();
        $form = $this->createForm(IndustriesType::class, $industry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($industry);
            $entityManager->flush();

            return $this->redirectToRoute('address_new',['industry'=>$industry->getId()]);
        }

        return $this->render('industries/new.html.twig', [
            'industry' => $industry,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="industries_show", methods={"GET"})
     */
    public function show(Industries $industry): Response
    {
		$address = $industry->getAddresses();
		$members = $industry->getMembers();
		$employees = $industry->getEmployees();
        return $this->render('industries/show.html.twig', [
            'industry' => $industry,
			'employees'=>$employees,
			'members'=>$members,
			'addresses'=>$address,
        ]);
    }



    /**
     * @Route("/{id}/edit", name="industries_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Industries $industry): Response
    {
        $form = $this->createForm(IndustriesType::class, $industry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('industries_index');
        }

        return $this->render('industries/edit.html.twig', [
            'industry' => $industry,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="industries_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Industries $industry): Response
    {
        if ($this->isCsrfTokenValid('delete'.$industry->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($industry);
            $entityManager->flush();
        }

        return $this->redirectToRoute('industries_index');
    }
	
		 private function getData(IndustriesRepository $industriesRepository): array
    {
        /**
         * @var $user User[]
         */
		 //$industriesRepository=new IndustriesRepository();
        $list = [];
        $industries = $industriesRepository->reports();

        foreach ($industries as $industry) {
			//unset($industry['ind_id']);
            $list[] = [
				$industry['ind_id'],
                $industry['ind_name'],
                $industry['kebele_name'],
                $industry['loc_name'],
                $industry['house_no'],
                $industry['phone_no'],
                $industry['ind_year'],
                $industry['sub_name'],
                $industry['bus_name'],
                $industry['organized_type'],
                $industry['tin_no'],
                $industry['starting_capital'],
                $industry['source'],
                $industry['cur_cash_capital'],
                $industry['cur_asset_capital'],
				$industry['total_ccapital'],				
                $industry['progress_level'],
                $industry['mmale'],
                $industry['mfemale'],				
				$industry['mmale'] + $industry['mfemale'],				
				$industry['less29'],
                $industry['above29'],					
				$industry['less29'] + $industry['above29'],				
                $industry['md'],
                $industry['fd'],					
				$industry['md'] + $industry['fd'],				
                $industry['smale'],
                $industry['sfemale'],						
				$industry['smale'] + $industry['sfemale'],				
                $industry['sfmale'],
                $industry['sffemale'],					
				$industry['sfmale'] + $industry['sffemale'],			
                $industry['scmale'],
                $industry['scfemale'],						
				$industry['scmale'] + $industry['scfemale'],				
                $industry['cmale'],
                $industry['cfemale'],						
				$industry['cmale'] + $industry['cfemale'],				
                $industry['cfmale'],
                $industry['cffemale'],						
				$industry['cfmale'] + $industry['cffemale'],				
                $industry['ccmale'],
                $industry['ccfemale'],
				$industry['ccmale'] + $industry['ccfemale'],
			]
            ;
        }
        return $list;
    }
	
  

}
