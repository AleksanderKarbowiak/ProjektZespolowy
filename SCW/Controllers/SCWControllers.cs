using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using SCW.Entities;
using SCW.Models;
using AutoMapper;
using Microsoft.EntityFrameworkCore;

namespace SCW.Controllers
{
    [Route("SCW/Field")]
    public class SCWControllers : ControllerBase
    {
        private readonly SCWDbContext _dbContext;
        private readonly IMapper _mapper;
        public SCWControllers(SCWDbContext dbContext, IMapper mapper)
        {
            _dbContext = dbContext;
            _mapper = mapper;
        }
        [HttpGet]
        public ActionResult<IEnumerable<FieldsDTO>> GetAllField()
        {
            var fields = _dbContext
                .Fields
                .Include(r => r.Faculty)
                .Include(r => r.Subjects)
                .ToList();

            var fieldsDtos = _mapper.Map<List<FieldsDTO>>(fields);

            return Ok(fieldsDtos);

        }

        [HttpGet("{id}")]
        public ActionResult<IEnumerable<FieldsDTO>> GetField([FromRoute] int id)
        {
            var fields = _dbContext
                .Fields
                .Include(r => r.Faculty)
                .Include(r => r.Subjects)
                .FirstOrDefault(r => r.Id == id);

            if (fields == null) return NotFound();

            var fieldsDtos = _mapper.Map<FieldsDTO>(fields);

            return Ok(fieldsDtos);

        }
    }

    
}
