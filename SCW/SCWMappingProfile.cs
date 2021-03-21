using AutoMapper;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using SCW.Entities;
using SCW.Models;

namespace SCW
{
    public class SCWMappingProfile : Profile
    {
        public SCWMappingProfile()
        {
            CreateMap<FieldOfStudy, FieldsDTO>()
                .ForMember(m => m.Faculty, s => s.MapFrom(c => c.Faculty.Name));


            CreateMap<Subject, SubjectDTO>();


        }



    }
}
